
@extends('templateUser')
@section('contentMediaPage')


<!-------------------------------------------->

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Gerer les utilisateurs</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Admin</a></li>
						<li> <span class="ion-ios-arrow-right"></span> utilisateurs</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-------------------------------------------->

<div class="page-single ">

	<div class="container" style="min-height:200px;color:white;">
        <div>
            <table>
                <thead style="background-color:#4280bf;">
                    <tr>
                        <th>Photo</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Statut</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td><img src="{{$user->profile_photo_path?$user->profile_photo_path:'/catalogue/public/images/uploads/author2.png'}}" width="50rem"></td>
                        <td>{{$user->nom}}</td>
                        <td>{{$user->prenom}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role==1?"Admin":"User"}}</td>
                        <form action="/catalogue/public/admin/changeUserStatut" method="post">
                        @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @if($user->statut==1)
                            <td>
                                <input class="btn" type="submit" name="statut" value="Autorisé" style="  background-color: #4CAF50;border: none;color: white;text-decoration: none;margin: 4px 2px;cursor: pointer;">
                            </td>
                            @else
                            <td>
                                <input class="btn" type="submit" name="statut" value="Bloqué" style="  background-color: #eb2a2a;border: none;color: white;text-decoration: none;margin: 4px 2px;cursor: pointer;">
                            </td>
                            @endif
                        </form>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

	</div>
</div>



@endsection
