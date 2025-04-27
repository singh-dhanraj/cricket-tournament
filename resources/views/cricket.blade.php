<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CricketTournament</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <div class="add_team">
    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
      <button>Add team</button></a>
  </div>

  <div class="card_section">

    @foreach ($teams as $team)
    <div class="team_card">
      <div class="team_section">
      <img src="{{ asset('uploads/team-logo/' . $team->logo) }}" alt="">
      <b>{{ $team->name }}</b>
      </div>

      <div class="player_list">
      <a href="" data-bs-toggle="modal" data-bs-target="#edit-team-{{ $team->id }}"><button
        class=" btn btn-sm btn-primary">edit</button></a>

      <a href="{{ route('team.delete', $team->id) }}"><button class=" btn btn-sm btn-primary">delete </button></a>

      <a href="{{ route('player-list', $team->id) }}"><button class="btn">Player List</button></a>
      </div>
    </div>


    <div class="modal fade" id="edit-team-{{ $team->id }}" tabindex="-1" aria-labelledby="editTeamLabel-{{ $team->id }}"
      aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h5 class="modal-title" id="editTeamLabel-{{ $team->id }}">Edit Team: {{ $team->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Form -->
        <form action="{{ route('team.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="team_id" value="{{ $team->id }}">

        <div class="modal-body">

          <!-- Team Name Input -->
          <div class="mb-3">
          <label class="form-label">Team Name</label>
          <input type="text" class="form-control" name="name" value="{{ $team->name }}" required>
          </div>

          <!-- Team Logo Input -->
          <div class="mb-3">
          <label class="form-label">Team Logo</label>
          <input type="file" class="form-control" name="logo">

          <div class="mt-2">
            <img src="{{ asset('uploads/team-logo/' . $team->logo) }}" alt="Current Logo" style="height: 80px;">
          </div>
          </div>

        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Team</button>
        </div>

        </form>

      </div>
      </div>
    </div>

  @endforeach



    <!-- <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('images pakistan.png') }}" alt="">
        <b>pakistan cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>

    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('australia-sport-cricket-team-logo-.png') }}" alt="">
        <b>australia cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('Bangladesh_Cricket_Board_Logo.svg.png') }}" alt="">
        <b>Bangladesh cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('hd-logo-of-afghanistan-national-cricket-team-.png') }}" alt="">
        <b>afghanistan cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('the-west-indies-cricket-team-windies-logo.png') }}" alt="">
        <b>west-indies cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('south-africa-national-cricket-team-logo-png_.png') }}" alt="">
        <b>south-africa cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('images srilanka.jpeg') }}" alt="">
        <b>srilanka cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('channels4_profile england.jpg') }}" alt="">
        <b>england cricket team</b>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div>

    <div class="team_card">
      <div class="team_section">
        <img src="{{ asset('images newzland.png') }}" alt="">
        <b>newzland cricket team</h3>
      </div>

      <div class="player_list">
        <a href=""><button class="btn">Player List</button></a>
        <a href=""><button class="btn"> Add Player </button></a>
      </div>
    </div> -->

  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('team.save') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div>
              <label for="title" class="mb-3">Team Name</label>
              <input type="text" class="form-control" name="team_name">
            </div>

            <div>
              <label for="title" class="mb-3">Team Logo</label>
              <input type="file" class="form-control" name="team_logo">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Team</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>