/**
скрипт для формы создания договора
*/

import { SearchForm } from "../components/SearchForm";
import { PairForm } from "../components/PairForm";
import { DocPreview } from "../components/DocPreview";

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
        "company_name",
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
        "filename",
    );

    const preview = new DocPreview("templates");
    preview.setListeners(templateform);
};
