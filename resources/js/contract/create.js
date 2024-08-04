// const perpage = 5;
// let currpage = 1;

// alert();
window.onload = async () => {
    // let clients = await getClients(false);
    // let clientsJson = await clients.json();
    // console.log(clientsJson);
    // dispLines(clientsJson);
    const clientform = new SearchForm("clients");
    const templateform = new SearchForm("templates");
};

class SearchForm {
    // let recordsEl
    // recordCounterEl
    constructor(id_prefix) {
        this.subject = id_prefix;
        this.searchEl = document.querySelector("#" + id_prefix + "-search");
        this.recordsEl = document.querySelector("#" + id_prefix + "-records");
        this.counterEl = document.querySelector("#" + id_prefix + "-counter");

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
        let clients = await this.getRecords(this.searchEl.value);
        let clientsJson = await clients.json();

        this.page = clientsJson.current_page;
        this.last_page = clientsJson.last_page;

        this.setCounter(clientsJson);
        this.dispLines(clientsJson);
        console.log(clientsJson);
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

    decrPage() {
        if (this.page != 1) {
            this.page = --this.page;
            this.renderAll();
        }
    }

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

    // render single line
    makeLine(data) {
        // console.log(data);

        let delegate_name_short = `${data.delegate_surname}.${data.delegate_name[0]}.${data.delegate_th_name[0]}`;

        const card = `
            <tr class="record">
                <td class="table_crop_s table_overflow">
                    <input type="radio" name="client_id" id="record-radio-${data.id}" value="${data.id}" >
                </td>
                <td>
                    <label class="table_crop_s table_overflow"  title="${data.company_name}"
                    for="record-radio-${data.id}">${data.company_name}</label>
                </td>
                <td>
                    <label class="table_crop_s table_overflow" title="${delegate_name_short}" for="record-radio-${data.id}">${delegate_name_short}</label>
                </td>
            </tr>
        `;

        return card;
    }
    /*
     // set pages counters
    */
    setCounter(data) {
        // console.log(data)
        let content = `Страница ${this.page} из ${this.last_page}`;
        this.replaceText(this.counterEl, content);
    }

    // display the lines of
    dispLines(linesData) {
        // console.log(cardsData["data"]);
        // this.recordsEl.value = "";
        this.replaceText(this.recordsEl, "");
        if (linesData.data.length == 0) {
            let errMsg =
                "<tr> <td></td> <td>Не найдено искомых записей</td> <td></td></tr>";
            this.appendText(this.recordsEl, errMsg);
            return;
        }
        linesData["data"].forEach((curr) => {
            // console.log(curr);
            let linePlace = document.querySelector("#records");
            this.appendText(this.recordsEl, this.makeLine(curr));
        });
    }
}
