<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method='post'>
        <div class='subject'>
            <label for="">問卷名稱 : </label>
            <input type="text" name='subject'>
            <!-- <input type="hidden" name="ser" value="<?=md5(rand(1,10000000000));?>"> -->
        </div>
        <div class='options'>
            <div>
            <label for="">選項</label>
            <input type="text" name="option[]" id="">
            <input type="button" value="更多" onclick="moreOpt()">
            </div>
        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
            
        </div>
    </form>
</fieldset>

<script>
    function moreOpt(){
        let opt=`<div>
                <label for="">選項</label>
                <input type="text" name="option[]" id="">
                </div>`;
        $(".options").append(opt);
    }
</script>