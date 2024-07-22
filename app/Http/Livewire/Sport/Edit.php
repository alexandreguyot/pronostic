<?php

namespace App\Http\Livewire\Sport;

use App\Models\Sport;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Sport $sport;
    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->sport->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Sport $sport)
    {
        $this->sport = $sport;
        $this->mediaCollections = [

            'sport_picto' => $sport->picto,
        ];
    }

    public function render()
    {
        return view('livewire.sport.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->sport->save();
        $this->syncMedia();

        return redirect()->route('admin.sports.index');
    }

    protected function rules(): array
    {
        return [
            'sport.title' => [
                'string',
                'required',
            ],
            'mediaCollections.sport_picto' => [
                'array',
                'nullable',
            ],
            'mediaCollections.sport_picto.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
