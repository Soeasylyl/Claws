<div class="modal__edit_client">
    <div class="modal-content">
        {{--            <span class="close" id="closeModalBtn">&times;</span>--}}
        <h2>Редактирование информации о клиенте</h2>
        <form>
            <div class="inputWrapper">
                <div class="errors"></div>
                <input type="text" class="nameClient" placeholder="ФИО" name="Name">
            </div>
            <div class="inputWrapper">
                <div class="errors"></div>
                <textarea placeholder="Описание" class="descriptionClient" name="description"></textarea>
            </div>
            <div class="inputWrapper">
                <div class="errors"></div>
                <input type="text" class="contactsClient" placeholder="Как связаться" name="contact">
            </div>
            <div class="wrapper_btn">
                <button class="main-btn" id="save_changes__edit_modal" type="submit">Сохранить изменения</button>
                <button class="main-btn" id="close__edit_modal" type="submit">Закрыть</button>
            </div>
        </form>
    </div>
</div>
<div class="modal_background">

</div>
