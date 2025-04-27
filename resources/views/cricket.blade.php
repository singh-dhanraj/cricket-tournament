<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cricket Tournament</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <div class="add_team my-3 text-center">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTeamModal">Add Team</button>
  </div>

  <!-- Teams Card Section -->
  <div class="card_section d-flex flex-wrap justify-content-center gap-4">

    @foreach ($teams as $team)
    <div class="team_card card shadow" style="width: 18rem;">
      <div class="card-body text-center">
      <img src="{{ asset('uploads/team-logo/' . $team->logo) }}" class="img-fluid mb-2" alt="Team Logo"
        style="height:150px; object-fit:cover;">
      <h5 class="card-title">{{ $team->name }}</h5>

      <div class="d-flex justify-content-center gap-2 mt-3">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editTeamModal-{{ $team->id }}">
        Edit
        </button>

        <a href="#" class="btn btn-sm btn-danger">Delete</a>
        <a href="{{ route('player-list', $team->id) }}" class="btn btn-sm btn-secondary">Players</a>
      </div>
      </div>
    </div>

    <!-- Edit Team Modal -->
    <div class="modal fade" id="editTeamModal-{{ $team->id }}" tabindex="-1" aria-labelledby="editTeamModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="editTeamModalLabel">Edit Team: {{ $team->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('team.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="team_id" value="{{ $team->id }}">
        <div class="modal-body">

          <div class="mb-3">
          <label class="form-label">Team Name</label>
          <input type="text" class="form-control" name="name" value="{{ $team->name }}" required>
          </div>

          <div class="mb-3">
          <label class="form-label">Team Logo</label>
          <input type="file" class="form-control" name="logo">
          <div class="mt-2">
            <img src="{{ asset('uploads/team-logo/' . $team->logo) }}" alt="Current Logo" style="height: 80px;">
          </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Team</button>
        </div>
        </form>

      </div>
      </div>
    </div>

  @endforeach

  </div>

  <!-- Add Team Modal -->
  <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTeamModalLabel">Add New Team</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('team.save') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">

            <div class="mb-3">
              <label class="form-label">Team Name</label>
              <input type="text" class="form-control" name="team_name" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Team Logo</label>
              <input type="file" class="form-control" name="team_logo" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Add Team</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>

</html>