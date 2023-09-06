class Clients {
    constructor() {
        this.iconContainers = document.querySelectorAll('.clients__trash-container a');
        this.searchInput = document.querySelector('.clients__search-bar');
        this.searchClientsContainer = document.querySelector('.clients__container-search');
        this.btnAddNone = document.querySelector('#client__btn_add');

        this.init();
    }

    init() {
        this.deleteClient();
        this.expandedClientInput();
        // console.log(this.searchClientsContainer);
        this.searchClients();
    }

     searchClients () {
         this.searchInput && this.searchInput.addEventListener('input', async  () => {
            const searchTerm = this.searchInput.value.trim();
            const response = await fetch(`/clients/search?search=${searchTerm}`, {
                method: 'GET',
            })
            const resp = await response.json();
            this.searchClientsContainer.innerHTML = resp.htmlClients;
        })
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
        this.searchInput && this.searchInput.addEventListener('click', () => {
            this.btnAddNone.classList.add('none');
            this.searchInput.classList.add('expanded');
            this.searchInput.placeholder = '';

        });

        document.addEventListener('click', (event) => {
            if (event.target !== this.searchInput) {
                this.btnAddNone && this.btnAddNone.classList.remove('none');
                this.searchInput && this.searchInput.classList.remove('expanded');
                this.searchInput && (this.searchInput.placeholder = 'Поиск клиента');
            }
        });
    }
}
new Clients();
