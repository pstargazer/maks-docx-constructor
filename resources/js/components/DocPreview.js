// https://github.com/mwilliamson/mammoth.js
// TODO: method to add listeners to searchform

import mammoth from "mammoth";
import Swal from "sweetalert2"; // чтобы выдавать красявые окна ошибок

export class DocPreview {
    constructor(id_prefix) {
        this.id_prefix = id_prefix;
        this.docWrapperEl = document.querySelector(
            `#document-${this.id_prefix}-preview`,
        );
    }

    /*
        отрендерить компонент
    */
    async render() {
        this.clearDocument();
        let renderedContent = "";
        try {
            console.log(this.fileUrl);
            let documentBlob = await this.get(this.fileUrl);
            let result = await mammoth.convertToHtml({
                arrayBuffer: documentBlob,
            });
            console.log(result);
            renderedContent = result.value;
        } catch (err) {
            Swal.fire({
                title: "Ошибка!",
                text: "Такой файл не существует или его формат не поддерживается",
                icon: "error",
                confirmButtonText: "Продолжить",
            });
            console.error(err);
            return;
        }
        this.displayDocument(renderedContent);
    }

    /*
        получить blob файла для рендера
    */
    async get(url) {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": document.querySelector('input[name="_token"]')
                    .value,
            },
            body: JSON.stringify({
                client_id: 1,
                template_id: 1,
            }),
        });
        return response.arrayBuffer();
    }

    /*
        @param name
        присвоить имя файла
    */
    setDocUrl(name) {
        // this.filename = name;
        // this.fileUrl = `/${this.id_prefix}/view=${name}`;
        this.fileUrl = `/${this.id_prefix}/generate`;
        // this.fileUrl = name;
    }

    /*
        следить за нажатиями по форме, потом обновлять предпросмотр
        должно быть вызвано после конструктора вне класса
        @param SearchForm contract_form
    */
    setListeners(watched_form) {
        let recordsId = "#" + watched_form.subject + "-records";
        let tbody = document.querySelector(recordsId);
        // console.log(tbody);
        tbody.addEventListener("input", (event) => {
            let filename =
                event.target.parentElement.parentElement.getAttribute(
                    "data-filename",
                );
            this.setDocUrl(filename);
            this.render();
        });
    }

    /*
     * отрисовать документ
     */
    displayDocument(content) {
        this.docWrapperEl.innerHTML = content;
        this.docWrapperEl.removeAttribute("hidden");
    }
    /**
     * очистить поле предпросмотра
     */
    clearDocument() {
        this.docWrapperEl.setAttribute("hidden", "");
        this.docWrapperEl.innerHTML = "";
    }
}
