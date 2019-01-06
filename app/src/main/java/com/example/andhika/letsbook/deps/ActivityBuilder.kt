package com.example.andhika.letsbook.deps

import android.annotation.SuppressLint
import com.example.andhika.letsbook.MainActivity
import com.example.andhika.letsbook.detil_event.DetilEventActivity
import com.example.andhika.letsbook.fragment.detilTransaksi.DetilTransaksiActiviy
import com.example.andhika.letsbook.ketentuan.KetentuanActivity
import com.example.andhika.letsbook.login.LoginActivity
import com.example.andhika.letsbook.main.Main2Activity
import com.example.andhika.letsbook.register.RegisterActivity
import dagger.Module
import dagger.android.ContributesAndroidInjector


@SuppressLint("unused")
@Module
abstract class ActivityBuilder {

    @ActivityScoped
    @ContributesAndroidInjector
    abstract fun bindMainActivity(): MainActivity

    @ActivityScoped
    @ContributesAndroidInjector
    abstract fun bindLoginActivity() : LoginActivity


    @ActivityScoped
    @ContributesAndroidInjector
    abstract fun bindRegisterActivity() : RegisterActivity

    @ActivityScoped
    @ContributesAndroidInjector
    abstract fun bindMain2Activity() : Main2Activity

    @ActivityScoped
    @ContributesAndroidInjector
    abstract fun bindDetilEvent() : DetilEventActivity


    @ActivityScoped
    @ContributesAndroidInjector
    abstract fun bindTransaksiEvent() : DetilTransaksiActiviy


    @ActivityScoped
    @ContributesAndroidInjector
    abstract fun bindKetentuanEvent() : KetentuanActivity
}