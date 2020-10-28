@@ if (is_array($msg[0])): @@
    @@ foreach ($msg as $m): @@
        @@ if ($m[0] === 403 || $m[0] === 400): @@
            @ Utils::msg_erro($m[1]); @
        @@ elseif ($m[0] === 206): @@
            @ Utils::msg_aviso($m[1]); @
        @@ else: @@
            @ Utils::msg_sucesso($m[1]); @
    @@ endif @@
    @@ endforeach @@
@@ else : @@
    @@ if ($msg[0] === 403 || $msg[0] === 400): @@
        @ Utils::msg_erro($msg[1]); @
    @@ elseif ($msg[0] === 206): @@
        @ Utils::msg_aviso($msg[1]); @
    @@ else: @@
        @ Utils::msg_sucesso($msg[1]); @
    @@ endif @@
@@ endif @@
<br>
@@ voltar @@