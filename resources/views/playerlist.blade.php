<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Player List</title>
  <link rel="stylesheet" href="{{ asset('player.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-light">

  <div class="container mt-4">

    <!-- Top Buttons -->
    <div class="d-flex justify-content-between mb-4">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlayerModal">Add Player</button>
      <a href="{{ route('cricket') }}" class="btn btn-danger">Back to Team List</a>
    </div>

    <!-- Team Header -->
    <div class="team-header">
      <img src="{{ asset('uploads/team-logo/' . $team->logo) }}" alt="Team Logo" width="100">
      <h2 class="mt-2">{{ ucfirst($team->name) }} - Player List</h2>
    </div>

    <!-- Players List -->
    <div class="row">
      @foreach($players as $player)
      <div class="col-md-6">
      <div class="player-card d-flex align-items-center">
        <img src="{{ asset('uploads/player_logo/' . $player->player_logo) }}" alt="{{ $player->player_name }}">
        <div class="ms-3 flex-grow-1">
        <p class="mb-1"><b>Name:</b> {{ $player->player_name }}</p>
        <p class="mb-1"><b>Role:</b> {{ $player->Player_role }}</p>

        <div class="buttons">
          <a href="{{ route('player.delete', $player->id) }}" class="btn btn-sm btn-danger">Delete</a>
          <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
          data-bs-target="#editPlayerModal-{{ $player->id }}">Update</button>
        </div>
        </div>
      </div>
      </div>

      <!-- Edit Player Modal -->
      <div class="modal fade" id="editPlayerModal-{{ $player->id }}" tabindex="-1"
      aria-labelledby="editPlayerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="{{ route('player.update') }}" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Edit {{ $player->player_name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="player_id" value="{{ $player->id }}">

          <div class="mb-4">
          <label>Player Name</label>
          <input type="text" name="player_name" value="{{ $player->player_name }}" class="form-control" required>
          </div>

          <div class="mb-4">
          <label>Player Role</label>
          <input type="text" name="player_role" value="{{ $player->Player_role }}" class="form-control" required>
          </div>

          <div class="mb-3">
          <label>Player Image</label>
          <input type="file" name="player_logo" class="form-control">
          <div class="mt-2">
            <img src="{{ asset('uploads/player_logo/' . $player->player_logo) }}" width="80" height="80"
            class="img-thumbnail">
          </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Player</button>
        </div>
        </form>
      </div>
      </div>

    @endforeach
    </div>
  </div>

  <!-- Add Player Modal -->
  <div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('save.player') }}" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add Player to {{ $team->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="team_id" value="{{ $team->id }}">

          <div class="mb-3">
            <label>Player Name</label>
            <input type="text" name="player_name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Player Role</label>
            <input type="text" name="player_role" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Player Image</label>
            <input type="file" name="player_logo" class="form-control" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add Player</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>