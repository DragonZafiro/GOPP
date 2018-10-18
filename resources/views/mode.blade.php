@extends('mode.index')
@section('nickname',auth()->user()->nick)
@section('name',auth()->user()->name)
