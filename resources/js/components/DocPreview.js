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
    async render(filename,client_id) {
        alert()
        this.setDocUrl(`/${this.subject}/generate?template_id=${filename}&client_id=${client_id}`)
        if(filename && client_id) {
        // if(true) {
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
                    text: err.message,
                    icon: "error",
                    confirmButtonText: "Продолжить",
                });
                console.error(err);
                return;
            }
            this.displayDocument(renderedContent);
        }

    }

    /*
        получить blob файла для рендера
    */
    async get(url) {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
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
    setDocUrl(name, client_id) {
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
    setListeners(watched_client, watched_template) {
        // let recordsId = "#" + watched_client.subject + "-records";
        let tbody_client = document.querySelector(`#${watched_client.subject}-records`);
        let tbody_template = document.querySelector(`#${watched_template.subject}-records`);

        
        // console.log(tbody);
        tbody_client.addEventListener("input", async (event) => {
            let client_id = event.target.parentElement.parentElement.getAttribute('data-id');
            this.client_id = client_id
            console.log(this.client_id);
            
            if(this.template_id && this.client_id) await this.render(this.template_id, this.client_id)
        });

        tbody_template.addEventListener("input", async (event) => {
            let template_name = event.target.parentElement.parentElement.getAttribute('data-id');
            this.template_id = template_name
            // this.template_name
            console.log(this.template_id);
            console.log(this.client_id);

            if(this.template_id && this.client_id) await this.render(this.template_id, this.client_id)
        })
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
