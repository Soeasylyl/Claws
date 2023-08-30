<div class="modal__edit_client">
    <div class="modal-content">
        {{--            <span class="close" id="closeModalBtn">&times;</span>--}}
        <h2>Редактирование информации о клиенте</h2>
        <form>
            <div class="inputWrapper">
                <div class="errors"></div>
                <input type="text" id="nameClient" placeholder="ФИО" name="Name">
            </div>
            <div class="inputWrapper">
                <div class="errors"></div>
                <textarea placeholder="Описание" id="descriptionClient" name="description"></textarea>
            </div>
            <div class="inputWrapper">
                <div class="errors"></div>
                <input type="text" id="contactsClient" placeholder="Как связаться" name="contact">
            </div>
            <div class="wrapper_btn">
                <button class="btn_all" id="edit__client" type="submit">Изменить</button>
                <button class="btn_all" id="close__modal" type="submit">Закрыть</button>
            </div>
        </form>
    </div>
</div>
<div class="modal_background">

</div>
