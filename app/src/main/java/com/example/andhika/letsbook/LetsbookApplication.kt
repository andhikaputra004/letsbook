package com.example.andhika.letsbook

import com.example.andhika.letsbook.deps.DaggerAppComponent
import com.example.andhika.letsbook.deps.NetworkModule
import com.example.andhika.letsbook.deps.SharedPreferenceModule
import com.example.andhika.letsbook.utils.Costant.Common.Companion.LETSBOOK
import dagger.android.AndroidInjector
import dagger.android.DaggerApplication

class LetsbookApplication : DaggerApplication() {
    override fun applicationInjector(): AndroidInjector<out DaggerApplication>? {
        val appComponent = DaggerAppComponent
            .builder()
            .application(this)
            .sharedPreferences(SharedPreferenceModule(LETSBOOK,this))
            .networkModule(NetworkModule())
            .build()
        appComponent.inject(this)
        return appComponent
    }

}