export class SearchForm {
    /**
     *
     * @param {*} id_prefix
     * префикс,вставляемый в id элементов компонента
     * @param {*} fields
     * массив объектов для формирования таблицы и заголовков
     */
    constructor(id_prefix, fields, lineData) {
        this.fields = fields;
        this.subject = id_prefix;
        this.lineData = lineData; // имя поля, как в fields, которое будет показываться в data-аттрибуте строки таблицы
        // define component parts
        this.searchEl = document.querySelector("#" + id_prefix + "-search");
        this.recordsEl = document.querySelector("#" + id_prefix + "-records");
        this.counterEl = document.querySelector("#" + id_prefix + "-counter");
        this.headerEl = document.querySelector("#" + id_prefix + "-thead");

        this.paginationPrevEl = document.querySelector(
            "." + id_prefix + "-pagination-prev",
        );
        this.paginationNextEl = document.querySelector(
            "." + id_prefix + "-pagination-next",
        );

        this.page = 1;
        this.perpage = 5;

        this.listenAll();
        this.renderAll();
    }

    // gets the data and rerenders
    async renderAll() {
        let records = await this.getRecords(this.searchEl.value);
        let recordsJson = await records.json();

        this.page = recordsJson.current_page;
        this.last_page = recordsJson.last_page;

        this.makeHeader();
        this.setCounter(recordsJson);
        this.dispLines(recordsJson);
        this.setDisabled();
    }

    setDisabled() {
        if (this.page == 1 && this.page == this.last_page) {
            this.disablePrev();
            this.disableNext();
            return;
        }

        if (this.page == 1) {
            this.disablePrev();
            this.enableNext();
            return;
        }

        if (this.page == this.last_page) {
            this.disableNext();
            this.enablePrev();

            return;
        }
        this.enableNext();
        this.enablePrev();
    }

    disablePrev() {
        this.paginationPrevEl.setAttribute("disabled", "");
    }

    disableNext() {
        this.paginationNextEl.setAttribute("disabled", "");
    }

    enablePrev() {
        this.paginationPrevEl.removeAttribute("disabled", "");
    }

    enableNext() {
        this.paginationNextEl.removeAttribute("disabled", "");
    }

    listenAll() {
        this.searchEl.addEventListener("input", () => {
            this.page = 1;
            this.renderAll();
        });

        this.searchEl.addEventListener("submit", (e) => {
            e.preventDefault();
        });

        this.paginationPrevEl.addEventListener("click", (e) => {
            this.decrPage();
        });
        this.paginationNextEl.addEventListener("click", (e) => {
            this.incPage();
        });
    }

    /*
    switch to prev page
    */
    decrPage() {
        if (this.page != 1) {
            this.page = --this.page;
            this.renderAll();
        }
    }

    /*
    switch to next page
    */
    incPage() {
        if (this.page != this.last_page) {
            this.page = ++this.page;
            this.renderAll();
        }
    }

    // get json of response
    async getRecords(search = false) {
        if (!search) {
            const recordsData = await fetch(
                `/api/${this.subject}/all?page=${this.page}`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-Token":
                            document.querySelector("input[name=_token]").value,
                    },
                },
            );
            return recordsData;
        }
        // access route if query present
        const recordsData = await fetch(
            `/api/${this.subject}/search=${search}?page=${this.page}`,
            {
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-Token":
                        document.querySelector("input[name=_token]").value,
                },
            },
        );
        return recordsData;
    }

    // literally just append the text
    appendText(el, content) {
        el.innerHTML = el.innerHTML + content;
    }

    replaceText(el, content) {
        el.innerHTML = content;
    }

    // render the table header
    makeHeader() {
        let header = this.fields.reduce((prev, curr) => {
            let content = `<th scope="col">${curr.name}</th>`;
            return prev + content;
        }, "");
        header = '<th scope="col"></th>' + header;
        this.replaceText(this.headerEl, header);
    }

    // сформировать строку формы
    makeLine(data) {
        // alert()
        let neededIdx = 0;
        if (this.lineData) {
            // найти индекс поля с нужным именем
            neededIdx = this.fields.findIndex(
                (value) => value.int_name == this.lineData,
            );
        }

        let card = `<tr class="${this.subject}-record record" data-${this.lineData}="${data[this.lineData]}">`;
        // добавить радиокнопку в начало
        card += `<td><input type="radio" class="form-row" name="${this.subject}-radio" id="${this.subject}-radio-${data.id}"></td>`;
        this.fields.forEach((el, idx) => {
            let cellvalue = this.makeCell(data, idx);
            card += `<td class="table_crop_s" >  <label for="${this.subject}-radio-${data.id}" title="${cellvalue}"> ${cellvalue} </label> </td>`;
        });
        card += "</tr>";
        return card;
    }

    /* сформировать содержимое клеточки
     *  @param idx - текущий индекс в объекте с полями
     *  @param data - данные запроса
     */
    makeCell(data, idx) {
        // let str = data[idx]["int_name"]; // текущий элемент с значением
        let str = this.fields[idx];
        if (str === undefined) return; // костыль чтобы работало без this.dataField
        if (typeof str["int_name"] === "object") {
            //если несколько полей в одной ячейке
            let arr = Array.from(this.fields[idx].int_name);
            let row = arr
                .values()
                .reduce(
                    (accumulator, curr) => accumulator + " " + data[curr],
                    "",
                );
            return row;
        } // если в ячейке только одно поле
        else return data[this.fields[idx]["int_name"]];
    }

    /*
        set pages counters
    */
    setCounter(data) {
        let content = `Страница ${this.page} из ${this.last_page}`;
        this.replaceText(this.counterEl, content);
    }

    // display the lines of subject records
    dispLines(linesData) {
        // this.recordsEl.value = "";
        this.replaceText(this.recordsEl, "");
        if (linesData.data.length == 0) {
            let errMsg =
                "<tr> <td></td> <td>Не найдено искомых записей</td> <td></td></tr>";
            this.appendText(this.recordsEl, errMsg);
            return;
        }

        linesData["data"].forEach((curr) => {
            this.appendText(this.recordsEl, this.makeLine(curr));
        });
        if (linesData["data"].length < this.perpage) {
            // let remainderLines = this.perpage - linesData["data"];
            let remainderLines = this.perpage - linesData["data"].length;
            for (let i = 0; i < remainderLines; i++) {
                this.appendText(
                    this.recordsEl,
                    `
                    <tr class="record">
                    <td>
                        <input type="radio" disabled>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                    `,
                );
            }
        }
    }
}
