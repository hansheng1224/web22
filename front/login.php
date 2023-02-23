<fieldset>
    <legend>會員登入</legend>
        <table>
            <tr>
                <td>帳號:</td>
                <td>
                    <input type="text" name="acc" id="acc">
                </td>
                <td>密碼:</td>
                <td>
                    <input type="password" name="pw" id="pw">
                </td>
            </tr>
            
        </table>
        <div>
                <button onclick="login()">登入</button>
                <button onclick="reset()">清除</button>
                <a href="?do=forget">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </div>
</fieldset>

<script>
    function reset(){
        $('#acc,#pw').val('')
    }

    function login(){
        let user={
            acc:$("#acc").val(),
            pw:$("#pw").val()
        }
        $.post("./api/chk_acc.php",user,(result)=>{
            console.log('result',result);
            if(parseInt(result)===1){
                $.post("./api/chk_pw.php",user,(result)=>{
                    if(parseInt(result)===1){
                        if(user.acc==='admin'){
                            location.href='back.php';
                        }else{
                            location.href='index.php';
                        }
                    }else{
                        alert('密碼錯誤')
                        reset()
                    }
                })
            }else{
                alert('查無此帳號')
                reset()
            }
        })
    }
</script>