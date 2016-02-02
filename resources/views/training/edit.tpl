{extends file="assets/index.tpl"}

{block name="content"}

    <h1>{$training.name}</h1>

    {if !empty($errors)}
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


    <form class="form-horizontal" action="{{Route('trainings.edit', [$training->id, $training->slug])}}" method="post">

        <div class="form-group row">
            <label class="form-control-label col-sm-2">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{$training->name}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="form-control-label col-sm-2">Maximale Teilnehmer</label>
            <div class="col-sm-10">
                <input type="number" min="1" class="form-control" name="maxAttendees" value="{$training->maxAttendees}" />
            </div>
        </div>

        <div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-default">speichern</button>
        </div>
    </form>

{/block}