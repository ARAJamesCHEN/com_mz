<main class="container">

    <form class="create-content" action= "createNewPoll.php?add" method="POST">
        <p class='bg-danger text-white'><?php echo $formBean->getWarning();?></p>
        <h3>Create New Poll Post </h3>

        <label>Board:</label>
        <span></span>
        <select name="boardID">
            <?php
                if(is_array($formBean->getBoards()) && !empty($formBean->getBoards())){
                    foreach ($formBean->getBoards() as $key => $value){
                        if(intval($formBean->getSelectedBoard() ) == intval($key)){
                            echo "<option  value='$key' selected>$value</option>";
                        }else{
                            echo "<option value='$key'>$value</option>";
                        }
                    }
                }
            ?>
        </select>

        <label>Question:</label>
        <span class="star">*</span>
        <input type="text" name="question" value="<?php echo $formBean->getQuestion() ?>" required="required"></input>
        <p class='bg-danger text-white'><?php echo $formBean->getTitleWarning() ?></p>

        <label>Add your options:</label>
        <span class="star">*</span>
        <input type="text" name="option1" value="<?php
                if(isset($formBean->getOptions()[0])){
                    echo $formBean->getOptions()[0];
                }
            ?>" required="required">
        <input type="text" value="<?php
                if(isset($formBean->getOptions()[1])){
                    echo $formBean->getOptions()[1];
                }
             ?>"
             name="option2">
        <input type="text" value="<?php
               if(isset($formBean->getOptions()[2])){
                   echo $formBean->getOptions()[2];
               }
               ?>" name="option3">
        <input type="text" value="<?php
            if(isset($formBean->getOptions()[3])){
                echo $formBean->getOptions()[3];
            }
            ?>"

               name="option4">
        <input type="text" value="<?php
            if(isset($formBean->getOptions()[4])){
                echo $formBean->getOptions()[4];
            }
            ?>"
               name="option5">
        <p class='bg-danger text-white'><?php echo $formBean->getOptionWarning()?></p>

        <label><a href="#" class="star">Add one more option</a></label>
        <span></span>
        <span></span>

        <div class="content-layout">
            <input type="checkbox" name="multi_choice" value="<?php echo $formBean->isMultiple()?>" class="content-layout-input"></input>
            <span class="content-layout-label">Multiple Choices</span>
            <span></span>
            <p class='bg-danger text-white'><?php echo $formBean->getisMutiWarning()?></p>
        </div>

        <label>Content:</label>
        <span></span>
        <textarea type="text" name="content"
                  rows="13" cols="50"><?php echo $formBean->getContent()?></textarea>
        <p class='bg-danger text-white'><?php echo $formBean->getContentWarning()?></p>

        <div class="text-right btn-mini btn-margin btn-small">
            <input type="submit" value="Creat New Poll" class="btn">
        </div>
    </form>
</main>