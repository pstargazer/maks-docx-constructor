// https://github.com/mwilliamson/mammoth.js
// TODO: method to add listeners to searchform

import mammoth from "mammoth";

export class DocPreview {
    constructor(id_prefix) {
        this.id_prefix = id_prefix;
        this.render();
    }

    /*
        отрендерить компонент
    */
    async render() {
        let documentBlob = await this.get(
            `/${this.id_prefix}/viewsrc=test.docx`,
        );
        let result = await mammoth.convertToHtml({ arrayBuffer: documentBlob });
        let renderedContent = result.value;
        let messages = result.messages;
        if (messages) {
        }
        this.displayDocument(renderedContent);

        // .then(function (result) {
        //     var html = result.value; // The generated HTML
        //     var messages = result.messages; // Any messages, such as warnings during conversion
        //     console.log(messages);
        //     console.log(html);
        //     this.displayDocument(html);
        // })
        // .catch(function (error) {
        //     console.error(error);
        // });
    }

    /*
        получить blob файла для рендера
    */
    async get(url) {
        const response = await fetch(url);
        return response.arrayBuffer();
    }

    /*
        @param name
        присвоить имя файла
    */
    setDocUrl(name) {
        // this.filename = name;
        this.url = `/${this.id_prefix}/view=${name}`;
    }

    /*
        следить за нажатиями по форме, потом обновлять предпросмотр
        должно быть вызвано после конструктора вне класса
        @param SearchForm contract_form
    */
    setListeners(contract_form) {
        let recordsId = "#" + contract_form.subject + "-records";
        let tbody = document.querySelector(recordsId);
        console.log(tbody);
        tbody.addEventListener("click", (event) => {
            console.log(event.target.getAttribute("data-filename"));
            this.render();
        });
    }

    /*
     * отрисовать документ
     */
    displayDocument(content) {
        let docWrapper = document.querySelector(
            `#document-${this.id_prefix}-preview`,
        );
        console.log(docWrapper);
        docWrapper.innerHTML = content;
    }
}
