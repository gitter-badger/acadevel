{extends file="assets/index.tpl"}

{block name="content"}

    <h1>{$training.name}</h1>

    {if !empty($errors) && $errors->any()}
        <div class="alert alert-danger"  style="padding: 20px 0">
            <h4>Errors</h4>
            <ul>
                {foreach $errors->all() as $error}
                    <li>{$error}</li>
                {/foreach}
            </ul>
        </div>
    {/if}

    {if session('saved')}
        <h1>SUCCESS! THX!</h1>
    {/if}


    <form class="form-horizontal" action="{{Route('backend.trainings.update', [$training->id])}}" method="post">

        <div class="form-group row">
            <label class="form-control-label col-sm-2">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{$training->name}" />
            </div>
        </div>

        <div>
            {{csrf_field()}}
            {{method_field('put')}}
            <button type="submit" class="btn btn-default">speichern</button>
        </div>
    </form>

{/block}