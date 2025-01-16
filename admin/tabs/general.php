<?php
function headingCells() {
    ?><tr>
        <th scope="col">Title</th>
        <th scope="col">Shortcode</th>
        <th scope="col">Active (actions)</th>
    </tr><?php
}
?>
<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<a href="?page=my-carousel&tab=carousel-edit" class="page-title-action">Add New Carousel</a>
<div id="mc__admin--list">
    <div class="col-container">
        <table class="striped widefat">
            <thead>
                <?php headingCells(); ?>
            </thead>
            <tbody>
                <?php
                $carousels = selectAllCarouselsList();
                foreach($carousels as $carousel) {
                    ?><tr class="mc__admin--item" >
                        <td class="has-row-actions"><?php echo $carousel->name; ?>
                            <div class="row-actions"><span class="edit"><a href="?page=my-carousel&tab=carousel-edit&carousel-id=<?php echo $carousel->id; ?>" aria-label="Edit “<?php echo $carousel->name; ?>”">Edit</a>
                            <!-- | </span><span class="trash"><a href="http://plugin-dev-local-environment.local/wp-admin/post.php?post=1&amp;action=trash&amp;_wpnonce=42d6865ad7" class="submitdelete" aria-label="Move “Hello world!” to the Trash">Trash</a></span> -->
                        </div>
                        </td>
                        <td><pre><?php echo '[my-carousel id="'.$carousel->id.'"]'; ?></pre></td>
                        <td><?php echo $carousel->active; ?></td>
                    </tr><?php
                }
                ?>
            </tbody>
            <tfoot>
                <?php headingCells(); ?>
            </tfoot>
        </table>
    </div>
</div>
