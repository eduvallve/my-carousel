<li class="mc__card">
    <div class="mc__card__actions">
        <span class="mc__card__showhide" title="Show/hide">
        <input type="hidden" class="mc__card__visibility" name="mc__card__showhide__state[]" value="<?php echo isset($showhide) ? $showhide : 'true' ; ?>">
        <span class="mc__card__showhide__state <?php echo isset($showhide) && $showhide === 'true' ? '' : 'hidden' ; ?>"><span class="dashicons dashicons-visibility"></span>Visible</span>
        <span class="mc__card__showhide__state <?php echo isset($showhide) && $showhide === 'true' ? 'hidden' : '' ; ?>"><span class="dashicons dashicons-hidden"></span>Hidden</span>
        </span>
        <span class="mc__card__remove" title="Remove">
            <span class="dashicons dashicons-trash"></span>
        </span>
    </div>
    <label for="mc__card__img">
        <span class="dashicons dashicons-format-image"></span>
        <input type="url" id="mc__card__img" name="mc__card__img[]" placeholder="URL image from Media" <?php echo isset($img) ? 'value="'.$img.'"' : '' ; ?>>
    </label>
    <label for="mc__card__img__alt">
        <input type="text" id="mc__card__img__alt" name="mc__card__img__alt[]" placeholder="Image 'Alt' text" <?php echo isset($alt) ? 'value="'.$alt.'"' : '' ; ?>>
        <span class="dashicons dashicons-info" title="Accessibility measurement. Write a text that describes the image"></span>
    </label>
    <label for="mc__card__title">
        <span class="dashicons dashicons-editor-textcolor"></span>
        <input type="text" id="mc__card__title" name="mc__card__title[]" placeholder="Title" <?php echo isset($title) ? 'value="'.$title.'"' : '' ; ?>>
    </label>
    <label for="mc__card__subtitle">
        <span class="dashicons dashicons-text"></span>
        <input type="text" id="mc__card__subtitle" name="mc__card__subtitle[]" placeholder="Subtitle" <?php echo isset($subtitle) ? 'value="'.$subtitle.'"' : '' ; ?>>
    </label>
    <label for="mc__card__btn">
        <span class="dashicons dashicons-button"></span>
        <input type="text" id="mc__card__btn" name="mc__card__btn[]" placeholder="Button text" <?php echo isset($btn) ? 'value="'.$btn.'"' : '' ; ?>>
    </label>
    <label for="mc__card__btn__url">
        <span class="dashicons dashicons-admin-links"></span>
        <input type="url" id="mc__card__btn__url" name="mc__card__btn__url[]" placeholder="Card pointing URL" <?php echo isset($url) ? 'value="'.$url.'"' : '' ; ?>>
    </label>
</li>