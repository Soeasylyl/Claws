class editClient {
    constructor() {
        this.modal = document.querySelector('.modal__edit_client');
        this.btnEdit = document.querySelectorAll('.clients__edit-btn');
        this.btnSaveChanges = document.querySelector('#save_changes__edit_modal');
        this.btnCloseModal = document.querySelector('#close__edit_modal');
        this.modalBackground = document.querySelector('.modal_background');
        this.bodyScrollLock = document.body;

        this.init();
    }

    init() {
        this.openModal();
        this.btnSaveChanges && this.btnSaveChanges.addEventListener("click", () => this.updateClient());
        this.btnCloseModal && this.btnCloseModal.addEventListener("click", (event) => {
            event.preventDefault();
            this.closeModal();
        });
    }

    openModal() {
        this.btnEdit && this.btnEdit.forEach(link => {
            link.addEventListener("click", (event) => {
                this.clientId = link.getAttribute('data-id');
                this.name = link.getAttribute('data-name');
                this.description = link.getAttribute('data-description');
                this.contacts = link.getAttribute('data-contacts');

                this.nameInput = this.modal.querySelector('#nameClient');
                this.descriptionInput = this.modal.querySelector('#descriptionClient');
                this.contactsInput = this.modal.querySelector('#contactsClient');

                this.nameInput.value = this.name;
                this.descriptionInput.value = this.description;
                this.contactsInput.value = this.contacts;

                this.modal && this.modal.classList.add('active');
                this.modalBackground && this.modalBackground.classList.add('active');
                this.bodyScrollLock.style.overflow = 'hidden';
            });
        });
    }

    closeModal() {
        this.modal && this.modal.classList.remove('active');
        this.modalBackground && this.modalBackground.classList.remove('active');
        this.bodyScrollLock.style.overflow = 'auto';
        this.clearModal();
    }

    async updateClient() {
        event.preventDefault();
        const name = this.nameInput.value;
        const description = this.descriptionInput.value;
        const contacts = this.contactsInput.value;

        this.response = await fetch('/clients/' + this.clientId + '/update', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify({
                id: this.clientId,
                name: name,
                description: description,
                contacts: contacts
            })
        });

        const resp = await this.response.json();

        if (resp.status) {
            location.reload();
            return;
        }

        this.clearDivErrors();
        if (Array.isArray(resp.errors)) {
            resp.errors.forEach(error => {
                if (error.type === 'name') {
                    const {inputElement, errorsDiv} = this.getElementAndErrors('nameClient');
                    errorsDiv.textContent = error.message;
                }
                if (error.type === 'description') {
                    const {inputElement, errorsDiv} = this.getElementAndErrors('descriptionClient');
                    errorsDiv.textContent = error.message;
                }
                if (error.type === 'contacts') {
                    const {inputElement, errorsDiv} = this.getElementAndErrors('contactsClient');
                    errorsDiv.textContent = error.message;
                }
            });
        }
    }

    getElementAndErrors(elementId) {
        const inputElement = this.modal.querySelector('#' + elementId);
        const parentDiv = inputElement.parentElement;
        const errorsDiv = parentDiv.querySelector('.errors');
        return { inputElement, errorsDiv };
    }

    clearModal() {
        this.getModalForm().reset();
        this.clearDivErrors();
    }

    clearDivErrors() {
        const errorDivs = this.getModalForm().querySelectorAll('.errors');
        errorDivs.forEach(errorsDiv => {
            errorsDiv.textContent = '';
        });
    }

    getModalForm()  {
        return this.modal.querySelector('form');
    }
}

new editClient();



