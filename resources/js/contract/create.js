/**
скрипт для формы создания договора
*/

import { SearchForm } from "../components/SearchForm";
import { PairForm } from "../components/PairForm";
import { DocPreview } from "../components/DocPreview";

function setListeners() {

}

// alert();
window.onload = async () => {
    // форма для клиентов
    const clientform = new SearchForm(
        "clients",
        [
            {
                name: "Имя",
                int_name: ["name_prefix", "company_name"],
            },
            {
                name: "Представитель",
                int_name: [
                    "delegate_surname",
                    "delegate_name",
                    "delegate_th_name",
                ],
            },
        ],
        "id",
    );
    // форма шаблонов
    const templateform = new SearchForm(
        "templates",
        [
            { name: "Имя", int_name: "name" },
            {
                name: "Экр. посл-ть",
                int_name: ["escaping_start", "escaping_end"],
                // data: true,
            },
        ],
        "id",
    );

    const preview = new DocPreview("contracts");
    preview.setListeners(clientform, templateform);
};
