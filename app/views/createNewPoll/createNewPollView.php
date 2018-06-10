<main class="container">

    <form class="create-content" action= "createNewPoll.php?add" method="post">
        <h3>Create New Poll Post</h3>

        <label>Board:</label>
        <span></span>
        <select name="board">
            <?php
                if(is_array($boardsInfoArray) && !empty($boardsInfoArray)){
                    foreach ($boardsInfoArray as $key => $value){
                        echo "<option value='$key'>$value</option>";
                    }
                }
            ?>
        </select>

        <label>Question:</label>
        <span class="star">*</span>
        <input type="text" id="form__title" name="question" required="required">

        <label>Add your options:</label>
        <span class="star">*</span>
        <input type="text" id="form__option_1" name="option1" required="required">
        <input type="text" id="form__option_2" name="option2">

        <label><a href="#" class="star">Add one more option</a></label>
        <span></span>
        <span></span>

        <div class="content-layout">
            <input type="checkbox" id="form__option_3" value="M" name="multi_choice" class="content-layout-input"></input>
            <span class="content-layout-label">Multiple Choices</span>
            <span></span>
        </div>

        <label>Content:</label>
        <span></span>
        <textarea type="text" id="form__content" name="content"
                  rows="13" cols="50"></textarea>

        <div class="text-right btn-mini btn-margin btn-small">
            <input type="submit" value="Creat New Poll" class="btn">
        </div>
    </form>
</main>