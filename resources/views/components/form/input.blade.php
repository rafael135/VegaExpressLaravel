<div class="mb-2">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <input type="{{$type ?? 'text'}}" class="form-control" name="{{$name}}" minlength="{{$min ?? '1'}}" required id="{{$name}}"
        placeholder="{{$placeholder ?? ''}}" value="{{$value ?? ''}}"/>
    <small id="{{$name}}HelpId" class="form-text text-muted d-none">Help text</small>
</div>