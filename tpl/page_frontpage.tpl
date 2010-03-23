<div class="links">
{foreach from=$links key="id" item="link"}
<h3>
  <a href="javascript:Votes.vote({$id}, -1);" class="vote down"><span class="arrow down"></span><span class="arrow body"></span></a>
  <a href="javascript:Votes.vote({$id}, 1);" class="vote up"><span class="arrow up"></span><span class="arrow body"></span></a>
	<a href="{$link.url}">
		{$link.name}
	</a>
	<span class="submitter">de {$link.submitter} ({$link.karma})</span>
</h3>
{/foreach}
</div>

