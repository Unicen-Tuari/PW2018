{include file="header.tpl"}
<h1>Lista de Tareas</h1>
<ul>

  {foreach from=$tareas item=tarea}
    {if $tarea['finalizada'] == 1}
      <li class="tachado">
    {else}
      <li>
    {/if}

      <a href="detalle/{$tarea['id']}">{$tarea['titulo']}</a>: {$tarea['descripcion']} <a href="borrar/{$tarea['id']}">Borrar</a> <a href="finalizar/{$tarea['id']}">Finalizar</a>
    </li>
  {/foreach}


</ul>
<a href="crear">Crear Tarea</a>
{include file="footer.tpl"}
