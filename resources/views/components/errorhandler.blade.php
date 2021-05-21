<script type="text/javascript">
    (function() {
        @if(!empty(session('notify_error')))
            @php
                $data = session('notify_error');
                if(is_array($data)){
                    $res = $data;
                    foreach($res as $re){
                        $data.=$re.'</br>';
                    }
                }
            @endphp
            $.toast({
                heading: 'Error',
                text: '<?php print $data; ?>',
                showHideTransition: 'fade',
                icon: 'error'
            })
        @endif
        @if(!empty(session('notify_success')))
            @php
                $data = session('notify_success');
                if(is_array($data)){
                    $res = $data;
                    foreach($res as $re){
                        $data.=$re.'</br>';
                    }
                }
            @endphp
            $.toast({
                heading: 'Success',
                text: '<?php print $data; ?>',
                showHideTransition: 'slide',
                icon: 'success'
            })
        @endif
        @if(!empty(session('notify_info')))
            @php
                $data = session('notify_info');
                if(is_array($data)){
                    $res = $data;
                    foreach($res as $re){
                        $data.=$re.'</br>';
                    }
                }
            @endphp
            $.toast({
                heading: 'Information',
                text: '<?php print $data; ?>',
                showHideTransition: 'slide',
                icon: 'info'
            })
        @endif
        @if(!empty(session('notify_message')))
            @php
                $data = session('notify_message');
                if(is_array($data)){
                    $res = $data;
                    foreach($res as $re){
                        $data.=$re.'</br>';
                    }
                }
            @endphp
            $.toast('<?php print $data; ?>')
        @endif
    })();
</script>