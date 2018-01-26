<script type="text/javascript">
    
    // 获取元素。
    var small = document.getElementById('product-main-img');
    var big = document.getElementById('big');
    var smallImg = document.getElementById('smallImg');
    var bigImg = document.getElementById('bigImg');
    var move = document.getElementById('move');
    var con = document.getElementById('product-images');


    // 全局变量。
    var moveW = 0;
    var moveH = 0;
    var smallW = 0;
    var smallH = 0;
    var bigImgW = 0;
    var bigImgH = 0;
    var mXP = 0;
    var mYP = 0;


    // 添加事件。
    small.onmouseover = function()
    {
        // 让右侧大图显示。
        big.style.display = 'block';
        move.style.display = 'block';
        // 计算。
        // 获取 big 的宽度和高度。
        var bigW = big.offsetWidth;
        var bigH = big.offsetHeight;
        // 获取 bigImg 的宽度和高度。
        bigImgW = bigImg.offsetWidth;
        bigImgH = bigImg.offsetHeight;

        // 计算百分比。
        mXP = bigW / bigImgW;
        mYP = bigH / bigImgH;

        // 获取 small 的宽度和高度。
        smallW = small.offsetWidth;
        smallH = small.offsetHeight;

        moveW = smallW * mXP;
        moveH = smallH * mYP;

        // console.log(moveW);
        // console.log(moveH);

        // 设置。
        move.style.width = moveW + 'px';
        move.style.height = moveH + 'px';
    }


    small.onmousemove = function(event)
    {
        // 获取鼠标的坐标。
        var event = event || window.event;

        var mouseX = event.pageX;
        var mouseY = event.pageY;
        // 获取 con的偏移。
        var conLeft = con.offsetLeft;
        var conTop = con.offsetTop;

        // 获取 small 的偏移。
        var smallLeft = small.offsetLeft;
        var smallTop = small.offsetTop;
        // 计算 move 的left 和top
        var moveLeft = mouseX - conLeft - smallLeft - moveW/2;
        var moveTop = mouseY - conTop - smallTop - moveH/2;

        // 检测。
        if(moveLeft <=0 )
        {
            moveLeft = 0;
        }
        if(moveTop <= 0)
        {
            moveTop = 0;
        }
        if(moveLeft >= smallW - moveW)
        {
            moveLeft = smallW - moveW;
        }
        if(moveTop >= smallH - moveH)
        {
            moveTop = smallH - moveH;
        }


        // 设置。
        move.style.left = moveLeft + 'px';
        move.style.top = moveTop + 'px';

        
        // 方法二。
        bigImg.style.left = -moveLeft / mXP + 'px';
        bigImg.style.top = -moveTop / mYP + 'px';

        this.style.cursor = 'move';


    }

    small.onmouseout = function()
    {
        move.style.display = 'none';
        big.style.display = 'none';
    }


    //获取排列小图
    var lis = document.getElementsByTagName('li');
    for(var i = 0; i < lis.length; i++)
    {
        lis[i].onmouseover = function()
        {
            // 获取 src
            // var src = this.firstElementChild.src;
            var src = this.firstElementChild.getAttribute('src');
            // 设置。
            smallImg.src = src;
            bigImg.src = src;
        }
    }

</script>