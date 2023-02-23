<div>
    <h3>請輸入信箱以查詢密碼</h3>
    <div>
        <input type="text" name="email" id="email">
    </div>
    <div id='result'>

    </div>
    <div>
        <button onclick="forget()">尋找</button>
    </div>
</div>

<script>
    function forget(){
        $.get('./api/forget.php',{email:$('#email').val()},(result)=>{
            $('#result').html(result)
        })
    }
</script>