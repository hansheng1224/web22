<style>
    .full{
        display: none;
        position: absolute;
        background-color: rgb(100,100,100);
        z-index: 1;
        padding: 1rem;
        box-shadow: 0 0 10px #999;
        left:-10px;
        top:5px;
        width:95%;
        height:500px;
        overflow: auto;
    }

    .news-title{
        cursor: pointer;
        background-color: #eee;
    }
</style>
<fieldset>
    <legend>
        目前位置 : 首頁 > 人氣文章區
    </legend>
    <table>
        <tr>
            <td width='30%'>標題</td>
            <td width='50%'>內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $all=$News->count(['sh'=>1]);
        $div=5;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(['sh'=>1]," order by `good` desc limit $start,$div");
        foreach($rows as $row){
            ?>
            <tr>
                <td class='news-title'><?=$row['title'];?></td>
                <td style='position:relative'>
                    <div class='short'><?=mb_substr($row['text'],0,20);?>...</div>
                    <div class='full'>
                        <h3 style='color:skyblue'><?=$News->type[$row['type']]?></h3>
                        <div style='color:white'><?=nl2br($row['text']);?></div>
                    </div>
                </td>
                <td>
                    <span class='num'><?=$Log->count(['news'=>$row['id']]);?></span>個人說
                    <img src="./icon/02B03.jpg" alt="" style='width:20px;height:20px;'>
                    <?php
                    if(isset($_SESSION['login'])){
                        if($Log->count(['news'=>$row['id'],'user'=>$_SESSION['login']])>0){
                            ?>
                            <a href="#" class='goods' data-user='<?=$_SESSION['login'];?>' data-news='<?=$row['id'];?>'>收回讚</a>
                            <?php
                        }else{
                            ?>
                            <a href="#" class='goods' data-user='<?=$_SESSION['login'];?>' data-news='<?=$row['id'];?>'>讚</a>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div>
        <?php
        if(($now-1)>0){
            $prev=$now-1;
            ?>
            <a href="index.php?do=pop&p=<?=$prev?>"> < </a>
            <?php
        }
        ?>

        <?php
        for($i=1;$i<=$pages;$i++){
            $size=($now==$i)?'26px':'16px';
            ?>
            <a href="index.php?do=pop&p=<?=$i?>" style='font-size:<?=$size?>'> <?=$i?> 
        </a>
            <?php
        }
        ?>

        <?php
        if(($now+1)<=$pages){
            $next=$now+1;
            ?>
            <a href="index.php?do=pop&p=<?=$bext?>"> > </a>
            <?php
        }
        ?>
    </div>

</fieldset>

<script>
    $(".news-title").hover(
        function(){
            $(this).next().children('.full').show();
        },
        function(){
            $(this).next().children('.full').hide()
        }
    )
    $('.full').hover(
        function(){
            $(this).show();
        },
        function(){
            $(this).hide();
        }
    )
</script>