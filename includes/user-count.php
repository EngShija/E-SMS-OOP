<div class="text-center">
    <div class="counts bg-info text-light text-center">
        <h4><?= count($student->get_students()) . " " ?> Students</h4>
    </div>
    <div class="counts bg-info text-light text-center">
        <h4><?= count($parent->get_parents()) . " " ?> Parents</h4>
    </div>
    <div class="counts bg-info text-light text-center">
        <h4><?= count($user->get_all_users()) . " " ?> Teachers</h4>
    </div>
    <div class="counts bg-info text-light text-center">
        <h4><?= count($user->get_admins()) . " " ?> Admins</h4>
    </div>
    <div class="counts text-light text-center bg-info">
    <h4><?= count($class->get_all_classes()) . " " ?> Classes</h4>
    </div>
    <div class="counts bg-info text-light text-center">
        <h4><?= count($subject->get_all_subjects()) . " " ?> Subjects</h4>
    </div>
</div>