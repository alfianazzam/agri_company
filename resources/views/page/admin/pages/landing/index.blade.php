@extends('layouts.admin')

@section('title', 'Page Landing')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

       



        <!-- 3. Our Works -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-briefcase me-1"></i>
                    Our Works
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('work')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="workCategory" class="form-label">Category</label>
                        <select class="form-select" id="workCategory">
                            <option selected>Choose category...</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="workImage" class="form-label">Work Image</label>
                        <input class="form-control" type="file" id="workImage" onchange="previewImage(event, 'workPreview')">
                    </div>
                    <div id="workPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="workTitle" class="form-label">Work Title</label>
                        <input class="form-control" type="text" id="workTitle" value="Work Title Here">
                    </div>
                    <div class="mb-3">
                        <label for="workDescription" class="form-label">Work Description</label>
                        <textarea class="form-control" id="workDescription" rows="3">Description of the work here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addWork()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Work Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="work1" id="work1">
                    <label class="form-check-label" for="work1">Existing Work 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="work2" id="work2">
                    <label class="form-check-label" for="work2">Existing Work 2</label>
                </div>
            </div>
        </div>

        <!-- 4. Articles -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-newspaper me-1"></i>
                    Articles
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('article')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Title</label>
                        <input class="form-control" type="text" id="articleTitle" value="Article Title Here">
                    </div>
                    <div class="mb-3">
                        <label for="articleImage" class="form-label">Article Image</label>
                        <input class="form-control" type="file" id="articleImage" onchange="previewImage(event, 'articlePreview')">
                    </div>
                    <div id="articlePreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <div class="mb-3">
                        <label for="articleText" class="form-label">Article Text</label>
                        <textarea class="form-control" id="articleText" rows="3">Content of the article goes here...</textarea>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addArticle()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Article Items:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="article1" id="article1">
                    <label class="form-check-label" for="article1">Existing Article 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="article2" id="article2">
                    <label class="form-check-label" for="article2">Existing Article 2</label>
                </div>
            </div>
        </div>

        <!-- 5. Meet Our Teams -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-users me-1"></i>
                    Meet Our Teams
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('team')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="teamName" class="form-label">Team Member Name</label>
                        <input class="form-control" type="text" id="teamName" value="Team Member Name Here">
                    </div>
                    <div class="mb-3">
                        <label for="teamRole" class="form-label">Role</label>
                        <input class="form-control" type="text" id="teamRole" value="Role Here">
                    </div>
                    <div class="mb-3">
                        <label for="teamImage" class="form-label">Team Image</label>
                        <input class="form-control" type="file" id="teamImage" onchange="previewImage(event, 'teamPreview')">
                    </div>
                    <div id="teamPreview" class="preview-container mb-3">
                        <h5>Preview:</h5>
                        <img src="" alt="Preview" style="max-width: 100%; height: auto; display: none;" />
                    </div>
                    <button type="button" class="btn btn-success" onclick="addTeamMember()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Team Members:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="team1" id="team1">
                    <label class="form-check-label" for="team1">Existing Team Member 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="team2" id="team2">
                    <label class="form-check-label" for="team2">Existing Team Member 2</label>
                </div>
            </div>
        </div>

        <!-- 6. Questions -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-question-circle me-1"></i>
                    Questions
                </span>
                <button class="btn btn-danger btn-sm" onclick="deleteSelected('question')">Delete Selected</button>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="questionText" class="form-label">Question</label>
                        <input class="form-control" type="text" id="questionText" value="Question Here">
                    </div>
                    <button type="button" class="btn btn-success" onclick="addQuestion()">Add</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <hr>
                <h5>Existing Questions:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="question1" id="question1">
                    <label class="form-check-label" for="question1">Existing Question 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="question2" id="question2">
                    <label class="form-check-label" for="question2">Existing Question 2</label>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection

