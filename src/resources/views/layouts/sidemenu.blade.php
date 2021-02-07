<div class="list-group">
    <a href="{{ route('home') }}" class="list-group-item <?=$active!='0'?:'active'?>">Dashboard</a>
    <a href="{{ route('merchant') }}" class="list-group-item <?=$active!='1'?:'active'?>">Merchants</a>
    <?php if(Auth::user()->isActive == '2'){?>
        <a href="{{ route('admin') }}" class="list-group-item <?=$active!='2'?:'active'?>">Admins</a>
    <?php }?>
</div>