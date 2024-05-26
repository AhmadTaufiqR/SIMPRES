<?php

namespace App\Livewire;

use App\Models\Schedule;
use App\Models\Teacher;
use Livewire\Component;

class TeacherTable extends Component
{
    public $search = '';

    public $teacherID;
    public $nip;
    public $name;
    public $email;
    public $gender;
    public $phone;
    public $address;
    public $password;



    public function editTeacher($teacherId)
    {
        $teacher = Teacher::find($teacherId);
        $this->teacherID = $teacher->id;
        $this->nip = $teacher->nip;
        $this->name = $teacher->name;
        $emailParts = explode('@', $teacher->email);
        $this->email = $emailParts[0];
        $this->gender = $teacher->gender;
        $this->phone = $teacher->phone;
        $this->address = $teacher->address;

    }

    public function updateTeacher()
    {
        $email = $this->email . '@sepatumas.sch.id';

        $teacher = Teacher::find($this->teacherID);
        $teacher->nip = $this->nip;
        $teacher->name = $this->name;
        $teacher->email = $email;
        $teacher->gender = $this->gender;
        $teacher->phone = $this->phone;
        $teacher->address = $this->address;
        $teacher->password = bcrypt($this->password);
        $teacher->save();

        session()->flash('Success', 'Data guru berhasil diubah.');

        $this->redirect('/teacher');
    }

    public function deleteTeacher($teacherId)
    {
        // Perform deletion logic
        Teacher::find($teacherId)->delete();
        Schedule::where('teachers_id', $teacherId)->delete();
        

        // Optionally add a session flash message or any other post-deletion logic
        session()->flash('Success', 'Guru berhasil dihapus');
        $this->redirect('/teacher');
    }

    public function render()
    {
        $teachers = Teacher::where('name', 'LIKE', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);

        return view('livewire.teacher-table', [
            'teacher' => $teachers
        ]);
    }
 



    

    

}
