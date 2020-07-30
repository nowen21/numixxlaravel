<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="card">
    <div class="card-header">{{$todoxxxx['alertasx']['notifica']}}</div>
    <div class="card-body">

        <ul class="nav nav-tabs">
            @foreach($todoxxxx['alertasx']['dataxxxx'] as $key=>$value)

            <li class="{{$key==0?'active':''}}"><a data-toggle="tab" href="#tabxxxx{{$key}}">
                {{$value['encabeza']['pestania']}}
                <span class="badge badge-light">{{$value['encabeza']['totalxxx']}}</span></a></li>
            @endforeach
            <!-- <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li> -->
        </ul>

        <div class="tab-content">
            @foreach($todoxxxx['alertasx']['dataxxxx'] as $key=>$value)
            <div id="tabxxxx{{$key}}" class="tab-pane fade {{$key==0?'in active':''}}">
                <div class="list-group">
                    @foreach($value['dataxxxx'] as $i=>$cuerpo)
                    <a href="{{$cuerpo['linkxxxx']}}" target="_blank"  class="list-group-item list-group-item-action">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><h3>{{$cuerpo['titulink']}}</h3></span>
                            <span class="input-group-text"><h4>{{$cuerpo['cuerpoxx']}}</h4></span>
                            <span class="input-group-text">{{$cuerpo['fechorax']}}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach

            <!-- <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div> -->
        </div>

    </div>

</div>
