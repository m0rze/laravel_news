"use strict";

class EntryActions {
    constructor() {
        this.url = "/admin/";
        this.token = document.querySelector("[name='_token']").value;
        this.currentEl = null;
    }

    async deleteItem(url, id) {
        let request = await fetch(`${url}/${id}`, {
            headers: {
                "X-CSRF-TOKEN": this.token
            },
            method: "DELETE",
            body: {
                "id": id
            }
        }).then(response => response.json())
            .catch(error => console.log(error));
        let result = await request;

        if (result.result === true) {
            this.currentEl.remove();
        } else {
            document.querySelector(".table-responsive").insertAdjacentHTML("afterbegin"
                , `
                <div class="alert alert-danger">
    Ошибка удаления записи
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right;"></button>
</div>
                `);
        }
    }

    config() {

        document.querySelectorAll(".delete-link").forEach(el => {
            el.addEventListener("click", (event) => {
                event.preventDefault();
                this.currentEl = event.target.closest("tr");
                this.deleteItem(this.url + event.target.dataset.type, event.target.dataset.id);
            });
        });
    }
}

export const categories = new EntryActions();
