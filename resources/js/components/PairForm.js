export class PairForm {
    constructor(id_prefix, contract_data) {
        this.newElDiv = Document.querySelector(id_prefix + "");
        this.renderAll();

        this.contract_data = contract_data;
    }

    renderAll() {}

    toJson() {}
}
