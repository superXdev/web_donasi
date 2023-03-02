<div class="col-lg-{{ ($size) ?? '3' }} col-6">
    <!-- small box -->
    <div class="small-box bg-{{ ($color) ?? 'primary' }}">
      <div class="inner">
        <h3>{{ $value }}</h3>

        <p>{{ $text }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-{{ $icon }}"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>