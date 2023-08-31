class addClient {
    constructor() {
        this.modal = document.querySelector('.modal__add_client');
        this.btnAdd = document.querySelector('#client__btn_add');
        this.btnCloseModal = document.querySelector('#close__add_modal');
        this.btnAddClient = document.querySelector('#add__client');
        this.modalBackground = document.querySelector('.modal_background');
        this.bodyScrollLock = document.body;

        this.init();
    }

    init() {
        this.openModal();
        this.addClient();
        this.btnCloseModal && this.btnCloseModal.addEventListener("click", (event) => {
            event.preventDefault();
            this.closeModal();
        })
    }

    openModal() {
        this.btnAdd && this.btnAdd.addEventListener("click", (event) => {
            this.modal && this.modal.classList.add('active');
            this.modalBackground && this.modalBackground.classList.add('active');
            this.bodyScrollLock.style.overflow = 'hidden';
        })
    }

    closeModal() {
        this.modal && this.modal.classList.remove('active');
        this.modalBackground && this.modalBackground.classList.remove('active');
        this.bodyScrollLock.style.overflow = 'auto';
        this.clearModal();
    }

    addClient() {
        this.btnAddClient && this.btnAddClient.addEventListener("click", async (event) => {
            event.preventDefault();
            const name = this.modal.querySelector('#nameClient');
            const description = this.modal.querySelector('#descriptionClient');
            const contacts = this.modal.querySelector('#contactsClient');

            const response = await fetch('/clients/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify({
                    name: name.value,
                    description: description.value,
                    contacts: contacts.value
                })
            });

            const resp = await response.json();

            if (resp.status) {
               location.reload();

                return;
            }

            this.clearDivErrors();
            resp.errors.forEach(error => {
                if (error.type === 'name') {
                    const { inputElement, errorsDiv } = this.getElementAndErrors('nameClient');
                    errorsDiv.textContent = error.message;
                }
                if (error.type === 'description') {
                    const { inputElement, errorsDiv } = this.getElementAndErrors('descriptionClient');
                    errorsDiv.textContent = error.message;
                }
                if (error.type === 'contacts') {
                    const { inputElement, errorsDiv } = this.getElementAndErrors('contactsClient');
                    errorsDiv.textContent = error.message;
                }
            });
        });
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

new addClient();



