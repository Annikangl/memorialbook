@extends('layouts.app')

<script src="{{asset('js/familytree.js')}}"></script>
        <div class="container" >
            <div class="tree__inner" style="margin-top: 100px !important;">
                <div class="tree__nav">
                    <div class="tree-nav__items">
                        <div class="tree-nav__item">
                            <a class="tree-nav__link active" href="../tree">Семейное древо</a>
                        </div>
                        <div class="tree-nav__item">
                            <a class="tree-nav__link" href="./tree-list">Список профилей</a>
                        </div>
                    </div>
                </div>
                <div class="tree__controls">
                    <a class="tree-controls__button -new btn btn-primary btn-sm" href="{{route('profile.create')}}">+ Добавить профиль</a>

                </div>
            </div>
            <div class="container-tree">
                <div id="tree"></div>
            </div>

        </div>


<script>

    {{--let profiles = {!! json_encode($profiles->toArray())!!};--}}
    var family = new FamilyTree(document.getElementById("tree"), {
        template: 'john',
        nodeBinding: {
            field_0: 'date',
            field_1: "name",
            field_2: "title",
            img_0: "img",

        },

        nodes: [
        ]

    });
    let profiles = @json($profiles);

    profiles.forEach(function(profile) {
        console.log(profile);
        if (profile.date_death==null){
            profile.date_death=" "
        }else {
            profile.date_death
        }

        family.add( { id:profile.id, pids: [], name:[profile.name +' '+profile.patronymic +' '+profile.surname], img:'storage/'+profile.avatar, gender: 'male', date:new Date(profile.date_birth).getFullYear()+' - '+new Date(profile.date_death).getFullYear() +' '+'г.'},)

        });
</script>
