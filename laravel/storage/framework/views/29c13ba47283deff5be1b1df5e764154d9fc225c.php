<div class="container">
    <div class="row">
        <form class="col-lg-12 col-xs-12" action="<?php echo e(route('danhsach.search')); ?>" role="search">
            <div class="input-group search-holder">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
                <input class="form-control search-input" id="search-input" type="search" name="q" placeholder="Nhập từ khóa Tìm Kiếm Truyện"
                       value="<?php echo e(old('q')); ?>" required="">
            
            </div>
            <div class="list-group list-search-res hide"></div>
        </form>
    </div>
</div>

