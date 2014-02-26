<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });
</script>

<div id="slider">
    <ul class="bxslider">
        <?php foreach($Model as $item){ ?>
        <li>
        <?php
            $path = $item->GetPath() . $item->GetFullName();
            echo img($path); ?>
        </li>
        <?php } ?>
    </ul>
</div>
