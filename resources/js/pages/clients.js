class Clients {
    constructor() {
        this.iconContainers = document.querySelectorAll('.clients__trash-container a');
        this.searchInput = document.querySelector('.clients__search-bar');
        this.btnAddNone = document.querySelector('#client__btn_add');
        this.init();
    }

    init() {
        this.deleteClient();
        this.expandedClientInput();
    }

    deleteClient() {
        this.iconContainers && this.iconContainers.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();

                const clientId = link.getAttribute('data-id');
                if (confirm('Вы уверены?')) {
                    document.getElementById('delete-form-' + clientId).submit();
                }
            });
        });
    }

    expandedClientInput() {
        this.searchInput.addEventListener('click', () => {
            this.btnAddNone.classList.add('none');
            this.searchInput.classList.add('expanded');
        });

        document.addEventListener('click', (event) => {
            if (event.target !== this.searchInput) {
                this.btnAddNone.classList.remove('none');
                this.searchInput.classList.remove('expanded');

            }
        });
    }
}
new Clients();
