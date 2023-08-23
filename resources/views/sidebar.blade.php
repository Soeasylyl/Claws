<section class="sidebar">
    <div class="sidebar__wrapper">
        <a href="{{ route('dashboard') }}" class="sidebar__button active" >
            <div class="sidebar__icon">
                <img src="{{ asset('images/svg/home.svg') }}" alt="Main_images">
            </div>
            <div class="sidebar__title">Основная</div>
        </a>

        <a href="{{ route('clients') }}" class="sidebar__button " >
            <div class="sidebar__icon">
                <img src="{{ asset('images/svg/users.svg') }}" alt="Сlients_images">
            </div>
            <div class="sidebar__title">Клиенты</div>
        </a>


        <a href="{{ route('notation') }}" class="sidebar__button">
            <div class="sidebar__icon">
                <img src="{{ asset('images/svg/file-text2.svg') }}" alt="Records_images">
            </div>
            <div class="sidebar__title">Записи</div>
        </a>

        <a href="{{ route('settings') }}" class="sidebar__button">
            <div class="sidebar__icon">
                <img src="{{ asset('images/svg/wrench.svg') }}" alt="settings_images">
            </div>
            <div class="sidebar__title">Настройки</div>
        </a>

        <a href="{{ route('statistics') }}" class="sidebar__button">
            <div class="sidebar__icon">
                <img src="{{ asset('images/svg/pie-chart.svg') }}" alt="statistics_images">
            </div>
            <div class="sidebar__title">Статистика</div>
        </a>
    </div>
</section>
