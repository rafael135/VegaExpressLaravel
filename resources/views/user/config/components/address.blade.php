<div class="address row">
    <div class="active col-lg-1">
        <div class="active-svg">
            <div class="circle {{($data->active != false) ? 'active' : 'disabled'}}"></div>
        </div>
    </div>
    <div class="cep col-lg-2">{{$data->cep}}</div>
    <div class="bairro col-lg-3 text-truncate" title="{{$data->bairro}}">{{$data->bairro}}</div>
    <div class="rua col-lg-2 text-truncate" title="{{$data->rua}}">{{$data->rua}}</div>
    <div class="numero col-lg-2">{{$data->numero}}</div>
    <div class="actions col-lg-2">
        <a class="action-edit" href="{{route("user.address.edit", ["id" => $data->id])}}">
        
        </a>
        <a class="action-delete" href="{{route("user.address.delete", ["id" => $data->id])}}">
            
        </a>
    </div>
</div>