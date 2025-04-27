<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>player_list</title>
  <link rel="stylesheet" href="{{ asset('player.css') }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>




  <div class="butt"><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPlayer">Add
      player</button>
    <a href="{{ route('cricket') }}"><button class="btn btn-danger btn-sm">back to team list</button></a>
  </div>



  <div class="team_header">

    <div class="logo">
      <div class="team_logo">
        <span><img src="{{ asset('uploads/team-logo/' . $team->logo) }}">
        </span>
        <h2>{{ ucfirst($team->name) }} </h2>
      </div>
      <h2 class="list">Player List</h2>
    </div>
  </div>

  @foreach ($players as $player)
    <div class="player_section">
    <div class="player_list">
      <span> <img src="{{ asset('uploads/player_logo/' . $player->player_logo) }}"
        alt="{{ $player->player_name }}"></span>
    </div>
    <div class="player_name">

      <div class="name">
      <b>Name:</b>
      <span>{{ $player->player_name }}</span>
      <br>
      <b>Role :</b>
      <span>{{ $player->Player_role }}</span>
      </div>

      <div class="update">

      <a href="{{ route('player.delete', $player->id) }}" class="btn btn-danger btn-sm float-end">delete</a>

      <a href="" data-bs-toggle="modal" data-bs-target="#edit-player-{{ $player->id }}"
        class="btn btn-primary btn-sm float-end">Update</a>
      </div>

    </div>
    </div>


    <div class="modal fade" id="edit-player-{{ $player->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">edit player in {{ $team->name }} </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('player.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

        <input type="hidden" name="player_id" value="{{ $player->id }}">
        <div>
          <label for="title" class="mb-3">player Name</label>
          <input type="text" class="form-control" name="player_name" value="{{ $player->player_name }}">
        </div>

        <div>
          <label for="title" class="mb-3">Player Image</label>
          <input type="file" class="form-control" name="player_logo" value="{{ $player->player_logo }}">
          <div><img src="{{ asset('uploads/player_logo/' . $player->player_logo) }}" alt=""></div>
        </div>

        <div>
          <label for="title" class="mb-3">player Role</label>
          <input type="text" class="form-control" name="player_role" value="{{ $player->Player_role}}">
        </div>

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">update Player</button>
        </div>
      </form>
      </div>
    </div>
    </div>

  @endforeach

  <!-- <h1><img src="{{ asset('uploads/team-logo/' . $team->logo) }}" alt=""> {{ ucfirst($team->name) }} PLAYER LIST</h1>

  <a href=""></a> class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPlayer">Add player</button>

  <div class="player_card">

    @foreach ($players as $player)
    <div class="show_list">
      <img src="{{ asset('uploads/player_logo/' . $player->player_logo) }}" alt="{{ $player->player_name }}">
    </div>
    <b>Name:</b>{{ $player->player_name }}

    <b>Role</b>{{ $player->Player_role }}
    @endforeach
  </div> -->


  <!-- model_2 -->
  <div class="modal fade" id="addPlayer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add player in {{ $team->name }} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('save.player') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">

            <input type="hidden" name="team_id" value="{{ $team->id }}">
            <div>
              <label for="title" class="mb-3">player Name</label>
              <input type="text" class="form-control" name="player_name">
            </div>

            <div>
              <label for="title" class="mb-3">Player Image</label>
              <input type="file" class="form-control" name="player_logo">
            </div>

            <div>
              <label for="title" class="mb-3">player Role</label>
              <input type="text" class="form-control" name="player_role">
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Player</button>
          </div>
        </form>


      </div>
    </div>
  </div>



</body>

</html>