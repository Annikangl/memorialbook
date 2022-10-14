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
            img_0: "img",

        },
        // nodes: [
        //     { id: 5, mid:2, fid:3, name: "Prince Philip", title: "Duke of Edinburgh", img: "https://cdn.balkan.app/shared/f3.png", gender: 'male' },
        // ]

    });

    family.load([

        // { id: 3, pids: [4], mid: null, fid: null, name: "Queen Elizabeth II", img: "https://cdn.balkan.app/shared/f5.png", gender: 'female' },
        // { id: 4, pids: [3], mid: 1, fid: 2, name: "Prince Philip", title: "Duke of Edinburgh", img: "https://cdn.balkan.app/shared/f3.png", gender: 'male' },



    ]);

    let profiles = @json($profiles);

    profiles.forEach(function(profile) {

        // if (profile.m_id==null){
        //     profile.m_id=1
        // }else {
        //     profile.m_id
        // }
        // if (profile.f_id==null){
        //     profile.f_id=2
        // }else {
        //     profile.f_id
        // }

        console.log(profile)

        family.addNode( { id:profile.id, pids:[profile.p_id], mid:profile.m_id, fid:profile.f_id, name:[profile.name +' '+profile.patronymic +' '+profile.surname], img:'storage/'+profile.avatar, gender: 'male', date:new Date(profile.date_birth).getFullYear()+' - '+new Date(profile.date_death).getFullYear() +' '+'г.'},)

        });
</script>
