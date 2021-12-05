@extends('templateUser')

<!-------------------------------------------->

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="container" id="favoriAdd">
                    <form action="/catalogue/public/user/favori" method="post" class="form-inline" style="display: inline-block;min-width:50%;">
                    @csrf
                        <row style="">
                            <input type="text" name="title" placeholder="Add to favorites">
                            </br>
                            <input class="btn" type="submit" value="Add" style="  background-color: #4CAF50;border: none;color: white;padding: 16px 32px;text-decoration: none;margin: 4px 2px;cursor: pointer;">
                        </row>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>