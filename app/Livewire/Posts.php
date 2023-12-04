<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

    public  $title, $description, $post_id;
    public $updateMode = false;

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::paginate(2),
        ]);
    }
    private function resetInputFields(){
        $this->title = '';
        $this->description = '';
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        Post::create($validatedDate);
  
        session()->flash('message', 'Post Created Successfully.');
  
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->description = $post->description;
  
        $this->updateMode = true;
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }

}
